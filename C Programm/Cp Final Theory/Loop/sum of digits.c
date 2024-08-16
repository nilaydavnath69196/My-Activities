#include <stdio.h>

int main() {
    int n, sum = 0, digit;

    printf("Enter an integer: ");
    scanf("%d", &n);

    // Loop to extract digits and calculate sum
    while (n != 0) {
        digit = n % 10;    // Extract the last digit
        sum = sum + digit;      // Add the last digit to the sum
        n = n/ 10;           // Remove the last digit
    }

    printf("Sum of digits: %d\n", sum);

    return 0;
}

