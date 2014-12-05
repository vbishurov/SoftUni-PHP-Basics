<?php
$board = preg_split('/\//', $_GET['board']);
for ($i = 0; $i < count($board); $i++) {
    $board[$i] = preg_split('/-/', $board[$i]);
}
if (checkBoard($board)) {
    $pieces = [];
    echo "<table>";
    foreach ($board as $key => $value) {
        echo "<tr>";
        foreach ($value as $piece) {
            echo "<td>$piece</td>";
            if (getPiece($piece)!= 'invalid') {
                if (!isset($pieces[getPiece($piece)])) {
                    $pieces[getPiece($piece)] = 1;
                } else {
                    $pieces[getPiece($piece)]++;
                }
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ksort($pieces);
    echo json_encode($pieces);
} else {
    echo "<h1>Invalid chess board</h1>";
}

function checkBoard($board)
{
    $isValidBoard = true;
    if (count($board) != 8) {
        $isValidBoard = false;
    } else {
        foreach ($board as $key => $value) {
            if (count($value) != 8) {
                $isValidBoard = false;
            } else {
                for ($i = 0; $i < 8; $i++) {
                    if ($value[$i] != 'R' && $value[$i] != 'H' && $value[$i] != 'K' && $value[$i] != 'P' && $value[$i] != 'Q' && $value[$i] != 'B' && $value[$i] != ' ') {
                        $isValidBoard = false;
                    }
                }
            }
        }
    }
    return $isValidBoard;
}

function getPiece($piece)
{
    switch ($piece) {
        case 'R' :
            return 'Rook';
            break;
        case 'H' :
            return 'Horseman';
            break;
        case 'B' :
            return 'Bishop';
            break;
        case 'K' :
            return 'King';
            break;
        case 'Q' :
            return 'Queen';
            break;
        case 'P' :
            return 'Pawn';
            break;
        default: return 'invalid';
            break;
    }
}

?>
 