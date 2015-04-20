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

/**
 * A service to handle comments
 *
 * @Flow\Scope("singleton")
 */
class CommentService {

	/**
	 * @param NodeTemplate $comment
	 * @param Node $referenceNode
	 */
	public function create(NodeTemplate $comment, Node $referenceNode) {
		$comment = $referenceNode->createNodeFromTemplate($comment);
		$this->emitCommentCreated($comment);
	}

	/**
	 * @param NodeInterface $comment
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitCommentCreated(NodeInterface $comment) {}

}