<?php
require_once __DIR__ . '/../DataStructures/AVLTree/AVLTree.php';
require_once __DIR__ . '/../DataStructures/AVLTree/AVLTreeNode.php';
require_once __DIR__ . '/../DataStructures/AVLTree/TreeTraversal.php';

use DataStructures\AVLTree\AVLTree as AVLTree;
use DataStructures\AVLTree\AVLTreeNode as AVLTreeNode;
use DataStructures\AVLTree\TreeTraversal as TreeTraversal;

$avlTree = new AVLTree();
$avlTree->insert(10, 'A');
$avlTree->insert(20, 'B');
$avlTree->insert(30, 'C');
$avlTree->insert(40, 'D');
$avlTree->insert(50, 'E');
$avlTree->insert(25, 'F');
$avlTree->insert(35, 'G');
$avlTree->insert(45, 'H');
$avlTree->insert(55, 'I');
$avlTree->insert(60, 'J');

// print_r(TreeTraversal::inOrder($avlTree->getRoot()));


TreeTraversal::printTree($avlTree->getRoot(), 0, 'inOrder', $avlTree);
TreeTraversal::printTree($avlTree->getRoot(), 0, 'preOrder', $avlTree);
TreeTraversal::printTree($avlTree->getRoot(), 0, 'postOrder', $avlTree);
TreeTraversal::printTree($avlTree->getRoot(), 0, 'breadthFirst', $avlTree);



echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
TreeTraversal::drawTree($avlTree->getRoot());

print_r($avlTree->serialize());
// TreeTraversal::serializeTree($avlTree->getRoot());
// $avlTree = new AVLTreeTest();
// $avlTree->setUp();
// $avlTree->populateTree();
// $avlTree->testInsertAndSearch();
// $avlTree->testInOrderTraversal();