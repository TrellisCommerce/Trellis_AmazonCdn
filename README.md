Trellis_AmazonCdn
=============

AoePeople_AmazonCdn fork with some improvements and customizations for our needs.

## Installing

Add something like the following to your composer.json:

```json
{
    "require": {
        "trellis/amazon-cdn": "~1.0.0"
    },
    "extra": {
        "magento-root-dir": "htdocs/"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/growwithtrellis/Trellis_AmazonCdn.git"
        },
        {
            "type": "vcs",
            "url": "https://github.com/aws/aws-sdk-php.git"
        },
        {
            "type": "composer",
            "url": "http://packages.firegento.com"
        }
    ]
}
```

Load the composer autoloader into Magento if you haven't done so yet.
You can do this by adding the following to the ``<global />`` node of ``app/etc/local.xml``:

```xml
<composer_vendor_path><![CDATA[{{root_dir}}/vendor]]></composer_vendor_path>
```

Then issue the ``composer install`` command.

## TODO
