#include <stdio.h>
#include <math.h>

int main() {
    int n, temp, divisor;

    printf("Enter an integer: ");
    scanf("%d", &n);

    // Find the divisor to extract the most significant digit
    temp = n;
    divisor = 1;
    while (temp >= 10) {
        temp /= 10;
        divisor *= 10;
    }

    printf("Digits in original order:\n");
    temp = n;
    while (divisor > 0) {
        int digit = temp / divisor; // Extract the most significant digit
        printf("%d\n", digit);
        temp %= divisor; // Remove the most significant digit
        divisor /= 10; // Move to the next digit
    }

    return 0;
}
