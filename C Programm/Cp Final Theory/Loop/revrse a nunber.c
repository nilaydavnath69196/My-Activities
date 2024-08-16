#include <stdio.h>

int main() {
    int n, reversed = 0, remainder;

    printf("Enter an integer: ");
    scanf("%d", &n);

    for( ; num!=0;num/=10) {
        // Get the last digit
        reversed = reversed * 10 + n%10; // Add the last digit to the reversed number
                        // Remove the last digit from the original number
    }

    printf("Reversed number: %d\n", reversed);

    return 0;
}

