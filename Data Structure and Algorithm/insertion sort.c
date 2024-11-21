/*
NILAY DAV NATH
DEPERTMNET OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - INSERTION SORT ALGRITHM IN C
DATE: 01/11/2024
*/
#include <stdio.h>

// Function for Insertion Sort
void insertionSort(int arr[], int size) {
    int i, key, j;

    // Traverse the array from the second element to the last
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
}

// Function to print the array
void printArray(int arr[], int size) {
    for (int i = 0; i < size; i++) {
        printf("%d ", arr[i]);
    }
    printf("\n");
}

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
    printArray(arr, size);

    // Sorting the array using insertion sort
    insertionSort(arr, size);

    printf("Sorted array: \n");
    printArray(arr, size);

    return 0;
}
