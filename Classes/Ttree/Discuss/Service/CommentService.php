<?php
namespace Ttree\Discuss\Service;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Ttree.Discuss".         *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TYPO3CR\Domain\Model\Node;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;
use TYPO3\TYPO3CR\Domain\Model\NodeTemplate;
use TYPO3\TYPO3CR\Domain\Service\NodeTypeManager;

/**
 * A service to handle comments
 *
 * @Flow\Scope("singleton")
 */
class CommentService {

	/**
	 * @Flow\Inject
	 * @var NodeTypeManager
	 */
	protected $nodeTypeManager;

	/**
	 * @param string $comment
	 * @param string $nodeType
	 * @param Node $referenceNode
	 */
	public function create($comment, $nodeType, Node $referenceNode) {
		$nodeTemplate = new NodeTemplate();
		$nodeTemplate->setNodeType($this->nodeTypeManager->getNodeType($nodeType));
		$nodeTemplate->setProperty('text', $comment);

		$comment = $referenceNode->createNodeFromTemplate($nodeTemplate);
		$this->emitCommentCreated($comment);
	}

	/**
	 * @param NodeInterface $comment
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitCommentCreated(NodeInterface $comment) {}

}