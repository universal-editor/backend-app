<?php

namespace common\modules\rest\v1\routing;

/**
 * @inheritdoc
 */
class UrlRule extends \yii\rest\UrlRule
{
    /**
     * @inheritdoc
     */
    protected function createRule($pattern, $prefix, $action)
    {
        $verbs = 'GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS|LOCK|UNLOCK';
        if (preg_match("/^((?:($verbs),)*($verbs))(?:\\s+(.*))?$/", $pattern, $matches)) {
            $verbs = explode(',', $matches[1]);
            $pattern = isset($matches[4]) ? $matches[4] : '';
        } else {
            $verbs = [];
        }

        $config = $this->ruleConfig;
        $config['verb'] = $verbs;
        $config['pattern'] = rtrim($prefix . '/' . strtr($pattern, $this->tokens), '/');
        $config['route'] = $action;
        if (!in_array('GET', $verbs)) {
            $config['mode'] = \yii\web\UrlRule::PARSING_ONLY;
        }
        $config['suffix'] = $this->suffix;

        return \Yii::createObject($config);
    }
}