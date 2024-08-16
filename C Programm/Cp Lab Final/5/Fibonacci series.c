#include <stdio.h>

int main() {
    int n, first = 0, second = 1, next, sum = 0;

    printf("Enter the number of terms: ");
    scanf("%d", &n);

    printf("Fibonacci Series: ");
    for (int i = 0; i < n; i++) {
        if (i == 0)
            next = 0;
        else if (i == 1)
            next = 1;
        else {
            next = first + second;
            first = second;
            second = next;
        }
        printf("%d ", next);
        sum += next;
    }

    printf("\nSum of Fibonacci Series: %d\n", sum);

    return 0;
}
