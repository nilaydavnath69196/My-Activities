#include <stdio.h>

int main() {
    int n, i, sum=0;
    printf("Enter A Number: ");
    scanf("%d", &n);

    for (i = 1; i < n; i++) {
        if (n % i == 0) {
            sum = sum + i; //is the condition is true than sum is addition by i
        }
    }

    if (sum == n) {
        printf("Perfect\n");
    } else {
        printf("NOT Perfect\n");
    }

    return 0;
}
