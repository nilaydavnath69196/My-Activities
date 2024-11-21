/*
NILAY DAV NATH
DEPERTMNET OF COMPUTER SCIENCE AND ENGINEERING
TOPIC - LINEAR SEARCH ALGRITHM IN C
DATE: 01/11/2024
*/

#include <stdio.h>

int linearSearch(int arr[], int size, int key) {
    for (int i = 0; i < size; i++) {
        if (arr[i] == key) {
            return i; // Return the index if key is found
        }
    }
    return -1; // Return -1 if key is not found
}

int main() {
    int arr[] = {10, 20, 30, 40, 50};
    int size = sizeof(arr) / sizeof(arr[0]);
    int key;

    printf("Enter the number to search: ");
    scanf("%d", &key);

    int result = linearSearch(arr, size, key);

    if (result != -1) {
        printf("Element found at index %d.\n", result+1);
    } else {
        printf("Element not found in the array.\n");
    }

    return 0;
}
