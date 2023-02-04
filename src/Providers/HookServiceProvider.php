<?php

namespace VigStudio\VigSeo\Providers;

use Illuminate\Support\ServiceProvider;
use MetaBox;
use VigStudio\VigSeo\Facades\ContentAnalyze;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        add_action(BASE_ACTION_META_BOXES, [$this, 'addSeoScore'], 99, 2);
    }

    public function addSeoScore(string $priority, $data)
    {
        if ($priority == 'advanced' && ! empty($data) && in_array(get_class($data), config('packages.seo-helper.general.supported', []))) {
            MetaBox::addMetaBox(
                'seo_score_wrap',
                'SEO Scanner',
                [$this, 'addPublishFields'],
                get_class($data),
                'advanced',
                'low'
            );

            return true;
        }

        return false;
    }

    public function addPublishFields()
    {
        $args = func_get_args();

        $meta = [
            'seo_title' => null,
            'seo_description' => null,
        ];

        if (! empty($args[0]) && $args[0]->id) {
            $metadata = MetaBox::getMetaData($args[0], 'seo_meta', true);
        }

        if (! empty($metadata) && is_array($metadata)) {
            $meta = array_merge($meta, $metadata);
        }

        $object = $args[0];

        $title = $meta['seo_title'] ?? (! empty($object->id) ? $object->name ?? $object->title : null);
        $description = $meta['seo_description'] ?? (! empty($object->id) ? $object->description : null);

        $content = '';
        $content .= '<html>';
        $content .= '<head>';
        $content .= '<title>'.$title.'</title>';
        $content .= '<meta name="description" content="'.$description.'">';
        $content .= '</head>';
        $content .= '<body>';
        $content .= '<h1>'.$title.'</h1>';
        $content .= $object->content;
        $content .= '</h1>';
        $content .= '</html>';

        $data = ContentAnalyze::analyze($args[0]->url, $content);

        return view('plugins/vig-seo::score-box', compact('data'))->render();
    }

    public function setKeywords(string $screen, $object): bool
    {
        $meta = $object->getMetaData('seo_keyword', true);

        MetaBox::saveMetaBoxData($object, 'seo_keyword', $meta);

        return true;
    }
}
