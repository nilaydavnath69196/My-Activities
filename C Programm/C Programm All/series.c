//1+2+3+3+4+.........+n
#include <stdio.h>

int main() {
    int i,n, sum=0;

    printf("Enter the value of n: ");
    scanf("%d", &n);


    for (int i = 1; i <= n; i++) {

        sum = sum + i;
    }
    printf("%d",sum);

    return 0;
}
