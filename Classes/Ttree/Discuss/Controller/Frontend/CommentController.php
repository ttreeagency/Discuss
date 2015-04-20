<?php
namespace Ttree\Discuss\Controller\Frontend;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Ttree.Discuss".         *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Ttree\Discuss\Service\CommentService;
use TYPO3\Eel\FlowQuery\FlowQuery;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use TYPO3\TYPO3CR\Domain\Model\Node;

/**
 * Controller for creating comment nodes
 *
 * @Flow\Scope("singleton")
 */
class CommentController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var CommentService
	 */
	protected $commentService;

	/**
	 * @param string $comment
	 * @param string $nodeType
	 * @param Node $referenceNode
	 * @return void
	 */
	public function createAction($comment, $nodeType, Node $referenceNode) {
		$this->commentService->create($comment, $nodeType, $referenceNode);

		$flowQuery = new FlowQuery(array($referenceNode));
		$closestDocument = $flowQuery->closest('[instanceof Ttree.Discuss:CommentableMixin]')->get(0);
		$this->redirect('show', 'Frontend\Node', 'TYPO3.Neos', array('node' => $closestDocument));
	}

}
