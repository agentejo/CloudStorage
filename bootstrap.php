<?php

// autoload vendor libs
include(__DIR__.'/vendor/autoload.php');


$this->on('cockpit.filestorages.init', function(&$storages) {

    $config = $this->retrieve('config/cloudstorage');

    if (!$config) {
        return;
    }

    foreach ($config as $key => $settings) {

        $type = isset($settings['type']) ? $settings['type'] : 's3';

        switch ($type) {

            case 's3':

                if (!isset($settings['key'], $settings['secret'], $settings['url'], $settings['region'], $settings['bucket'])) {
                    break;
                }

                $url = $settings['url'];

                if (!strpos($url, $settings['bucket'])) {
                    $url = "{$url}/{$settings['bucket']}";
                }

                $client = new Aws\S3\S3Client([
                    'credentials' => [
                        'key'    => $settings['key'],
                        'secret' => $settings['secret']
                    ],
                    'region'  => $settings['region'],
                    'version' => isset($settings['version']) ? $settings['version'] : 'latest',
                ]);

                $storages[$key] = [
                    'adapter' => 'League\Flysystem\AwsS3v3\AwsS3Adapter',
                    'args'    => [$client, $settings['bucket']],
                    'mount'   => true,
                    'url'     => $url
                ];

                break;
        }

    }
});
