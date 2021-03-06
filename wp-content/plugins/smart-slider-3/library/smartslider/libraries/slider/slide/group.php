<?php
N2Loader::import('libraries.slider.slide.slidecontentabstract', 'smartslider');

class N2SmartSliderGroup extends N2SmartSliderSlideContentAbstract {


    public function render($group) {

        if (!empty($group['generatorvisible']) && $this->slide->hasGenerator() && !$this->slider->isAdmin) {
            $filled = $this->slide->fill($group['generatorvisible']);
            if (empty($filled)) {
                return '';
            }
        }

        $innerHTML = '';
        if (is_array($group['layers'])) {
            foreach ($group['layers'] AS $layer) {
                if (isset($layer['type'])) {
                    $innerHTML .= $this->renderers[$layer['type']]->render($layer);
                } else {
                    $innerHTML .= $this->renderers['layer']->render($layer);
                }
            }
        }
        unset($group['layers']);

        $zIndex = $group['zIndex'];
        unset($group['zIndex']);

        $attributes = array(
            'style' => 'z-index: ' . $zIndex . ';',
            'class' => 'n2-ss-layer-group'
        );

        if (!empty($group['animations'])) {
            $attributes['data-animations'] = base64_encode(json_encode($group['animations']));
            unset($group['animations']);
        }

        if (!$this->slider->isAdmin) {
            unset($group['type']);
            unset($group['name']);
            unset($group['opened']);
        }

        if (!$this->slider->isAdmin && isset($group['parallax'])) {
            if ($group['parallax'] > 0) {
                $innerHTML = N2Html::tag('div', array(
                    'class' => 'n2-ss-layer-parallax'
                ), $innerHTML);
            } else {
                unset($group['parallax']);
            }
        }

        foreach ($group AS $k => $data) {
            $attributes['data-' . $k] = $data;
        }

        return N2HTML::tag('div', $attributes, $innerHTML);
    }
}