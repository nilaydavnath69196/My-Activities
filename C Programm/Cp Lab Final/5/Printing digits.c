#include <stdio.h>

int main() {
    int n, remainder;

    printf("Enter an integer: ");
    scanf("%d", &n);

    printf("Digits in reversed order:\n");
    while (n != 0) {
        remainder = n % 10; // Get the last digit
        printf("%d\n", remainder); // Print the last digit
        n /= 10; // Remove the last digit
    }

    return 0;
}
