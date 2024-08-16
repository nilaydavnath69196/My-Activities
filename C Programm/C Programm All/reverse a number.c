#include <stdio.h>

int main() {
    int n, reversed = 0, remainder;

    printf("Enter an integer: ");
    scanf("%d", &n);

    while (n != 0) {
        remainder = n % 10;          // Get the last digit
        reversed = reversed * 10 + remainder; // Add the last digit to the reversed number
        n /= 10;                     // Remove the last digit from the original number
    }

    printf("Reversed number: %d\n", reversed);

    return 0;
}
