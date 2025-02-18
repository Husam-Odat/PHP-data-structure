<?php


// Original Tree
//       4
//      / \
//     2   7
//    / \  / \
//   1  3 6  9

// Inverted Tree
//      4
//     / \
//    7   2
//   / \  / \
//  9   6 3  1




class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function invertTree($root)
{
    if ($root === null) {
        return null;
    }

    // Swap left and right children
    $temp = $root->left;
    $root->left = $root->right;
    $root->right = $temp;

    // Recursively invert the subtrees
    invertTree($root->left);
    invertTree($root->right);

    return $root;
}

// Helper function to print the tree (preorder traversal)
function printTree($node)
{
    if ($node === null) return;

    echo $node->val . " ";
    printTree($node->left);
    printTree($node->right);
}

// Creating the tree
$root = new TreeNode(4);
$root->left = new TreeNode(2, new TreeNode(1), new TreeNode(3));
$root->right = new TreeNode(7, new TreeNode(6), new TreeNode(9));

echo "Original Tree: ";
printTree($root);
echo PHP_EOL;

$invertedRoot = invertTree($root);

echo "Inverted Tree: ";
printTree($invertedRoot);
echo PHP_EOL;

// Original Tree: 4 2 1 3 7 6 9 
// Inverted Tree: 4 7 9 6 2 3 1 
