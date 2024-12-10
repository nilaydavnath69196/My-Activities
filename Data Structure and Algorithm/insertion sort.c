/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - INSERTION SORT ALGORITHM IN C
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

    // Insertion sort logic directly in main()
    int i, key, j;
    for (i = 1; i < size; i++) {
        key = arr[i];  // Store the current element to be inserted into the sorted part
        j = i - 1;

        // Move elements of arr[0..i-1] that are greater than key
        // to one position ahead of their current position
        while (j >= 0 && arr[j] > key) {
            arr[j + 1] = arr[j];
            j = j - 1;
        }

        // Place key in the correct position in the sorted part
        arr[j + 1] = key;
    }

    printf("Sorted array: \n");
    for (int i = 0; i < size; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");

    return 0;
}
