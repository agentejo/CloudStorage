Use cloud storage providers to store assets or thumbnails.

**Notice:** Only Amazon s3 supported right now

# Usage

Add files to `addons/CloudStorage`.

Then update the config (`config/config.yaml`), e.g:

```
cloudstorage:
    assets:
        type: s3
        key: xxxKeyxxx
        secret: xxxSecretxxx
        region: eu-central-1
        bucket: mybucket
        url: https://s3.eu-central-1.amazonaws.com
```

That's it!
