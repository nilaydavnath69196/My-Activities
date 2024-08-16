#include <stdio.h>

// Function to perform binary search
int binarySearch(int arr[], int n, int key) {
    int left = 0;
    int right = n - 1;

    while (left <= right) {
        int mid = left + (right - left) / 2;

        // Check if key is present at mid
        if (arr[mid] == key) {
            return mid; // Return index of the element if found
        }

        // If key greater, ignore left half
        if (arr[mid] < key) {
            left = mid + 1;
        }
        // If key is smaller, ignore right half
        else {
            right = mid - 1;
        }
    }

    // If key is not present in array
    return -1;
}

int main() {
    int n, key;

    // Input number of elements
    printf("Enter number of elements: ");
    scanf("%d", &n);

    int arr[n]; // Declare array of size n

    // Input elements in sorted order
    printf("Enter %d elements in sorted order:\n", n);
    for (int i = 0; i < n; i++) {
        scanf("%d", &arr[i]);
    }

    // Input element to search
    printf("Enter element to search: ");
    scanf("%d", &key);

    // Perform binary search
    int index = binarySearch(arr, n, key);

    // Output result
    if (index != -1) {
        printf("Element %d found at index %d.\n", key, index);
    } else {
        printf("Element %d not found.\n", key);
    }

    return 0;
}
