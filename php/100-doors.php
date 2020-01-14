<?php
// Problem: 100 Doors

// There are 100 doors in a row that are all initially closed.
// You make 100 passes by the doors. The first time through,
// visit every door and 'toggle' the door (if the door is closed, open it;
// if it is open, close it). The second time, only visit every 2nd door
// (i.e., door #2, #4, #6, ...) and toggle it. The third time, visit every
// 3rd door (i.e., door #3, #6, #9, ...), etc., until you only visit the 100th door.

// Implement a function to determine the state of the doors after the last pass.
// Return the final result in an array, with only the door number included in the array if it is open.

// Answer: [1, 4, 9, 16, 25, 36, 49, 64, 81, 100]

// Solution:
function getFinalOpenedDoors($numDoors)
{
    $doors = [];
    $iteration = 1;

    while ($iteration <= $numDoors) {
        for ($i = 0; $i < $numDoors; $i++) {
            if ($iteration === 1) {
                $doors[$i] = true;
            } else {
                if (($i + 1) % $iteration === 0) {
                    $doors[$i] = toggleDoor($doors[$i]);
                }
            }
        }
        $iteration++;
    }

    $openDoors = [];
    for ($j = 0; $j < $numDoors; $j++) {
        if ($doors[$j] === true) {
            array_push($openDoors, $j + 1);
        }
    }
    return $openDoors;
}

function toggleDoor($door)
{
    return $door === true ? false : true;
}

// Test:
print_r(getFinalOpenedDoors(100));
