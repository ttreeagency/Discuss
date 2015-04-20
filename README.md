Ttree.Discuss
=============

TYPO3 Neos package to support comment in frontend.

The package is based on TYPO3CR.

Installation
------------

Run `composer require ttree/discuss` in your distribution.

Configuration
-------------

You can enable the comment form on every instance of the Page Node Type by 
adding the following configuration in your `NodeTypes.yaml`:

```yaml
'TYPO3.Neos.NodeTypes:Page':
  superTypes:
    'Ttree.Discuss:CommentableMixin': 'Ttree.Discuss:CommentableMixin'
```

After this change you need to run `flow node:repair` to create the missing ContentCollection to store the document comments.

*Warning*: Later, if you add the `Ttree.Discuss:CommentableMixin` to a new Document node type, you must run `low node:repair`.

Your are now ready to render the comments feed and the comment form in your document Fluid template:

```html
<div class="comment-footer">
	{parts.comments -> f:format.raw()}
</div>
```

Todos
-----

* Support to reply to a specific comment (thread)
* Add support for comment author
* Sanitize comment content (security), and add support for basic formatting
* Moderation
* Neos backend module to have a better overview of the comments activity

Acknowledgments
---------------

Development sponsored by [ttree ltd - neos solution provider](http://ttree.ch).

We try our best to craft this package with a lots of love, we are open to sponsoring, support request, ... just contact us.

License
-------

Licensed under GPLv3+, see [LICENSE](LICENSE)