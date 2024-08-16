#include <stdio.h>

int main() {
    int size;

    // Take the size of the arrays as input from the user
    printf("Enter the size of the arrays: ");
    scanf("%d", &size);

    int array1[size], array2[size];

    // Take input for the first array
    printf("Enter elements of the first array:\n");
    for (int i = 0; i < size; i++) {
        printf("Element %d: ", i + 1);
        scanf("%d", &array1[i]);
    }

    // Take input for the second array
    printf("Enter elements of the second array:\n");
    for (int i = 0; i < size; i++) {
        printf("Element %d: ", i + 1);
        scanf("%d", &array2[i]);
    }

    // Print original arrays
    printf("Original array1: ");
    for (int i = 0; i < size; i++) {
        printf("%d ", array1[i]);
    }
    printf("\n");

    printf("Original array2: ");
    for (int i = 0; i < size; i++) {
        printf("%d ", array2[i]);
    }
    printf("\n");

    // Swap elements between arrays
    for (int i = 0; i < size; i++) {
        int temp = array1[i];
        array1[i] = array2[i];
        array2[i] = temp;
    }

    // Print swapped arrays
    printf("Swapped array1: ");
    for (int i = 0; i < size; i++) {
        printf("%d ", array1[i]);
    }
    printf("\n");

    printf("Swapped array2: ");
    for (int i = 0; i < size; i++) {
        printf("%d ", array2[i]);
    }
    printf("\n");

    return 0;
}

