Ttree.Discuss
=============

TYPO3 Neos package to support comment in frontend.

The package is based on TYPO3CR.

Installation
------------

Run `composer require ttree/discuss @dev` in your distribution.

Configuration
-------------

You can enable the comment form on every instance of the Page Node Type by 
adding the following configuration in your `NodeTypes.yaml`:

```yaml
'TYPO3.Neos.NodeTypes:Page':
  superTypes:
    'Ttree.Discuss:Commentable': 'Ttree.Discuss:Commentable'
```

Acknowledgments
---------------

Development sponsored by [ttree ltd - neos solution provider](http://ttree.ch).

We try our best to craft this package with a lots of love, we are open to sponsoring, support request, ... just contact us.

License
-------

Licensed under GPLv3+, see [LICENSE](LICENSE)