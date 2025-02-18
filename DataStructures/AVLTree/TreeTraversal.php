<?php

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request: #163
 * https://github.com/TheAlgorithms/PHP/pull/163
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\AVLTree;

abstract class TreeTraversal
{
    /**
     * Perform an in-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     * The in-order traversal is left -> root -> right.
     */
    public static function inOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result = array_merge($result, self::inOrder($node->left));
            $result[] = [$node->key => $node->value];
            $result = array_merge($result, self::inOrder($node->right));
        }
        return $result;
    }

    /**
     * Perform a pre-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     * The pre-order traversal is root -> left -> right.
     */
    public static function preOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result[] = [$node->key => $node->value];
            $result = array_merge($result, self::preOrder($node->left));
            $result = array_merge($result, self::preOrder($node->right));
        }
        return $result;
    }

    /**
     * Perform a post-order traversal of the subtree.
     * Recursively traverses the subtree rooted at the given node.
     * The post-order traversal is left -> right -> root.         
     */
    public static function postOrder(?AVLTreeNode $node): array
    {
        $result = [];
        if ($node !== null) {
            $result = array_merge($result, self::postOrder($node->left));
            $result = array_merge($result, self::postOrder($node->right));
            $result[] = [$node->key => $node->value];
        }
        return $result;
    }

    /**
     * Perform a breadth-first traversal of the AVL Tree.
     * The breadth-first traversal visits all nodes level by level.
     */
    public static function breadthFirst(?AVLTreeNode $root): array
    {
        $result = [];
        if ($root === null) {
            return $result;
        }

        $queue = [];
        $queue[] = $root;

        while (!empty($queue)) {
            $currentNode = array_shift($queue);
            $result[] = [$currentNode->key => $currentNode->value];

            if ($currentNode->left !== null) {
                $queue[] = $currentNode->left;
            }

            if ($currentNode->right !== null) {
                $queue[] = $currentNode->right;
            }
        }

        return $result;
    }

    //add to this draw the tree 
    public static function drawTree0(?AVLTreeNode $root, $level = 0)
    {
        if ($root !== null) {
            self::drawTree0($root->right, $level + 1);
            echo str_repeat("    ", $level) . $root->key . "\n";
            self::drawTree0($root->left, $level + 1);
        }
    }


    public static function drawTree(?AVLTreeNode $root, $level = 0, $prefix = "")
    {
        if ($root !== null) {
            self::drawTree($root->right, $level + 1, $prefix . "    ");

            if ($level > 0) {
                echo $prefix . "|";
            }
            echo $root->key . "\n";

            self::drawTree($root->left, $level + 1, $prefix . "    ");
        }
    }

    public static function printTree($node, $level = 0, $method, $instancetree)
    {
        echo ($method) .  "  ";
        echo ($method == 'inOrder') ? '(left -> root -> right)' : '';
        echo ($method == 'preOrder') ? '(root -> left -> right)' : '';
        echo ($method == 'postOrder') ? '(left -> right -> root)' : '';
        echo ($method == 'breadthFirst') ? '(all nodes level by level)' : '';
        echo  PHP_EOL;
        $result = self::$method($instancetree->getRoot());
        foreach ($result as $item) {
            foreach ($item as $key => $value) {
                echo "[$key] => $value ";
            }
        }
        echo  PHP_EOL;
    }
}
