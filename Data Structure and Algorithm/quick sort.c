/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - QUICK SORT ALGORITHM IN C
DATE: 01/11/2024
*/

#include <stdio.h>

int main() {
    int size;

    // Taking user input for the size of the array
    printf("Enter the number of elements: ");
    scanf("%d", &size);

    int arr[size];  // Declare an array of the given size

    // Taking user input for the array elements
    printf("Enter %d elements: \n", size);
    for (int i = 0; i < size; i++) {
        scanf("%d", &arr[i]);
    }

    printf("Original array: \n");
    for (int i = 0; i < size; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");

    // Implementing Quick Sort logic inside main() without a separate function
    int stack[size];  // Stack to simulate recursive calls
    int top = -1;
    stack[++top] = 0;  // Push initial values to stack
    stack[++top] = size - 1;

    while (top >= 0) {
        int high = stack[top--];
        int low = stack[top--];

        int pivot = arr[high];  // Choosing the last element as the pivot
        int i = low - 1;        // Index of smaller element

        // Move elements smaller than pivot to the left
        for (int j = low; j < high; j++) {
            if (arr[j] < pivot) {
                i++;
                // Swap arr[i] and arr[j]
                int temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }

        // Place pivot in the correct position
        int temp = arr[i + 1];
        arr[i + 1] = arr[high];
        arr[high] = temp;

        int pi = i + 1;  // Partition index

        // Push subarray indices onto the stack for sorting
        if (pi - 1 > low) {
            stack[++top] = low;
            stack[++top] = pi - 1;
        }

        if (pi + 1 < high) {
            stack[++top] = pi + 1;
            stack[++top] = high;
        }
    }

    printf("Sorted array: \n");
    for (int i = 0; i < size; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");

    return 0;
}
