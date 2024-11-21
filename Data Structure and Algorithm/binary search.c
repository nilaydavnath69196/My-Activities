/*
NILAY DAV NATH
DEPERTMNET OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - BINATY SEARCH ALGRITHM IN C
DATE: 01/11/2024
*/

#include <stdio.h>

// Function for Binary Search
int binarySearch(int arr[], int size, int key) {
    int low = 0, high = size - 1;

    while (low <= high) {
        int mid = low + (high - low) / 2;

        // Check if key is present at mid
        if (arr[mid] == key) {
            return mid; // Key found at index mid
        }

        // If key is smaller, ignore the right half
        if (arr[mid] > key) {
            high = mid - 1;
        }
        // If key is larger, ignore the left half
        else {
            low = mid + 1;
        }
    }

    return -1; // Key not found
}

int main() {
    int arr[] = {10, 20, 30, 40, 50};  // Sorted array
    int size = sizeof(arr) / sizeof(arr[0]);
    int key;

    printf("Enter the number to search: ");
    scanf("%d", &key);

    int result = binarySearch(arr, size, key);

    if (result != -1) {
        printf("Element found at index %d.\n", result+1); // 0-based index
    } else {
        printf("Element not found in the array.\n");
    }

    return 0;
}
