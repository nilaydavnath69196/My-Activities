#include <stdio.h>
#include <math.h>

#define MAX_SIZE 100

int main() {
    int n;
    float mean, variance, sum = 0.0;
    float data[MAX_SIZE];

    // Input number of elements
    printf("Enter the number of elements (max %d): ", MAX_SIZE);
    scanf("%d", &n);

    if (n <= 0 || n > MAX_SIZE) {
        printf("Invalid number of elements. Please enter a number between 1 and %d.\n", MAX_SIZE);
        return 1;
    }

    // Input elements
    printf("Enter %d elements:\n", n);
    for (int i = 0; i < n; i++) {
        scanf("%f", &data[i]);
        sum += data[i];
    }

    // Calculate mean
    mean = sum / n;

    // Calculate variance
    sum = 0.0;
    for (int i = 0; i < n; i++) {
        sum += pow(data[i] - mean, 2);
    }
    variance = sum / n;

    // Print results
    printf("Mean: %.2f\n", mean);
    printf("Variance: %.2f\n", variance);

    return 0;
}

