# Problem: 100 Doors

# There are 100 doors in a row that are all initially closed.
# You make 100 passes by the doors. The first time through,
# visit every door and 'toggle' the door (if the door is closed, open it;
# if it is open, close it). The second time, only visit every 2nd door
# (i.e., door #2, #4, #6, ...) and toggle it. The third time, visit every
# 3rd door (i.e., door #3, #6, #9, ...), etc., until you only visit the 100th door.

# Implement a function to determine the state of the doors after the last pass.
# Return the final result in an array, with only the door number included in the array if it is open.

# Answer: [1, 4, 9, 16, 25, 36, 49, 64, 81, 100]

# Solution:
def get_final_opened_doors(num_doors):
    doors = []
    iteration = 1

    while iteration <= num_doors:
        for i in range(num_doors):
            if iteration == 1:
                doors.append(True)
            else:
                if (i + 1) % iteration == 0:
                    doors[i] = toggle_door(doors[i])
        iteration += 1

    open_doors = []
    for j in range(num_doors):
        if doors[j] == True:
            open_doors.append(j + 1)

    return open_doors


def toggle_door(door):
    if door == True:
        return False
    else:
        return True

# Test:
print(get_final_opened_doors(100))
