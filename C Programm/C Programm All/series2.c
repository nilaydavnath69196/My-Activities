#include <stdio.h>

int main() {
    int n;
    long long product = 1; // Use long long to handle larger values

    printf("Enter the value of n: ");
    scanf("%d", &n);

    for (int i = 1; i <= n; i++) {
        product = product* i; // Multiply each value of i to the product
    }

    printf("The product of the sequence 1 * 2 * 3 * ... * %d is: %lld\n", n, product);

    return 0;
}
