#include <stdio.h>
#include <math.h>

int main() {
    int i, n;
    float b = 0; // Initialize b to 0 to store the sum

    printf("Enter the number: ");
    scanf("%d", &n);

    for (i = 1; i <= n; i++) {
        float a = (float)(i * i) / i; // Calculate the term a correctly
        b += a; // Accumulate the sum of the series
    }

    printf("The sum of series: %f\n", b);
    return 0;
}
