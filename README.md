Use cloud storage providers to store assets or thumbnails.

**Notice:** Only Amazon s3, Azure Blobstorage, Minio and Google Cloud Storage are supported right now

# Usage

Add files to `addons/CloudStorage`.

Then update the config (`config/config.yaml`), e.g:

### Amazon S3

```
cloudstorage:
    assets:
        type: s3
        key: xxxKeyxxx
        secret: xxxSecretxxx
        region: eu-central-1
        bucket: mybucket

        # optional
        endpoint: https://eu-central-1.amazonaws.com
        prefix: subfolder-name
        url: https://s3.eu-central-1.amazonaws.com
```

### Digital Ocean Spaces

```      
cloudstorage:
    assets:
        type: s3
        key: xxxKeyxxx
        secret: xxxSecretxxx
        region: us-sfo-2
        bucket: mybucket
        endpoint: https://sfo2.digitaloceanspaces.com
        url: https://sfo2.digitaloceanspaces.com/{bucket}
        
        # advanced options
        options:
          ACL: 'public-read'
```

### Azure Blobstorage

```
cloudstorage:
    assets:
        type: azure
        key: xxxKeyxxx
        account: my-account
        container: my-container

        # optional
        url: https://my-custom-url.com
```

### Minio

```
cloudstorage:
    assets:
        type: minio
        key: xxxKeyxxx
        secret: xxxSecretxxx
        bucket: mybucket

        # optional
        endpoint: http://localhost:9000
        region: us-east-1
        prefix: subfolder-name
        image_address: http://localhost:9000/mybucket
```

### Google Cloud Storage

```
cloudstorage:
    assets:
        type: gcp_storage
        bucket: mybucket

        # optional
        prefix: assets
        url: https://storage.googleapis.com/mybucket
```

Authorize Google Cloud Storage with an environment variable like this:

```
ENV GOOGLE_APPLICATION_CREDENTIALS=/keyFile.json
```

That's it!
