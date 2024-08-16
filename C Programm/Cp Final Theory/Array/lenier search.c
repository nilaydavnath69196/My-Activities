#include <stdio.h>

#define MAX_SIZE 100

// Function to perform linear search
int linearSearch(int arr[], int n, int key) {
    for (int i = 0; i < n; i++) {
        if (arr[i] == key) {
            return i; // Return index if element is found
        }
    }
    return -1; // Return -1 if element is not found
}

int main() {
    int n, key, arr[MAX_SIZE];

    // Input number of elements and elements themselves
    printf("Enter number of elements (max %d): ", MAX_SIZE);
    scanf("%d", &n);
    printf("Enter %d elements:\n", n);
    for (int i = 0; i < n; i++) {
        scanf("%d", &arr[i]);
    }

    // Input element to search
    printf("Enter element to search: ");
    scanf("%d", &key);

    // Perform linear search
    int index = linearSearch(arr, n, key);

    // Output result
    if (index != -1) {
        printf("Element %d found at index %d.\n", key, index);
    } else {
        printf("Element %d not found.\n", key);
    }

    return 0;
}

