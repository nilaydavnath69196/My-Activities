/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - BINARY SEARCH ALGORITHM IN C
DATE: 01/11/2024
*/

#include <stdio.h>

int main() {
    int arr[] = {10, 20, 30, 40, 50};  // Sorted array
    int size = sizeof(arr) / sizeof(arr[0]);
    int key;

    printf("Enter the number to search: ");
    scanf("%d", &key);

    // Binary Search logic directly inside main()
    int low = 0, high = size - 1;
    int result = -1;

    while (low <= high) {
        int mid = low + (high - low) / 2;

        // Check if key is present at mid
        if (arr[mid] == key) {
            result = mid; // Key found at index mid
            break;
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

    if (result != -1) {
        printf("Element found at index %d.\n", result + 1); // 0-based index
    } else {
        printf("Element not found in the array.\n");
    }

    return 0;
}





//for user input this code can be use
/*
NILAY DAV NATH
DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - BINARY SEARCH ALGORITHM IN C
DATE: 01/11/2024

#include <stdio.h>

int main() {
    int size;

    // Taking user input for the size of the array
    printf("Enter the number of elements: ");
    scanf("%d", &size);

    int arr[size];

    // Taking user input for the array elements
    printf("Enter %d sorted elements: \n", size);
    for (int i = 0; i < size; i++) {
        scanf("%d", &arr[i]);
    }

    int key;
    printf("Enter the number to search: ");
    scanf("%d", &key);

    // Binary Search logic directly inside main()
    int low = 0, high = size - 1;
    int result = -1;

    while (low <= high) {
        int mid = low + (high - low) / 2;

        // Check if key is present at mid
        if (arr[mid] == key) {
            result = mid; // Key found at index mid
            break;
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

    if (result != -1) {
        printf("Element found at index %d.\n", result + 1); // 0-based index
    } else {
        printf("Element not found in the array.\n");
    }

    return 0;
}
*/
