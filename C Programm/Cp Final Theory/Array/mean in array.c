#include <stdio.h>

int main() {
    int n;
    float sum = 0.0, mean;

    // Ask the user for the number of elements
    printf("Enter the number of elements: ");
    scanf("%d", &n);

    // Declare an array to store the elements
    float arr[n];

    // Input elements from the user
    printf("Enter the elements:\n");
    for (int i = 0; i < n; i++) {
        scanf("%f", &arr[i]);
    }

    // Calculate the sum of the elements
    for (int i = 0; i < n; i++) {
        sum += arr[i];
    }

    // Calculate the mean
    mean = sum / n;

    // Print the mean
    printf("The mean of the given elements is: %.2f\n", mean);

    return 0;
}

