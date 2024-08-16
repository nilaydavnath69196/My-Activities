#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>

// Function to determine if n is prime using the Sieve of Eratosthenes
bool isPrimeUsingSieve(int n) {
    if (n <= 1) return false; // Numbers less than or equal to 1 are not prime

    bool *prime = (bool *)malloc((n + 1) * sizeof(bool));
    if (prime == NULL) {
        printf("Memory allocation failed\n");
        return false;
    }

    // Initialize all entries in the prime array to true
    for (int i = 0; i <= n; i++) {
        prime[i] = true;
    }

    // Implementing the Sieve of Eratosthenes
    for (int p = 2; p * p <= n; p++) {
        if (prime[p]) {
            // Marking multiples of p as false
            for (int i = p * p; i <= n; i += p) {
                prime[i] = false;
            }
        }
    }

    bool isPrime = prime[n]; // Storing the result
    free(prime); // Freeing the allocated memory
    return isPrime; // Returning whether n is prime or not
}

int main() {
    int n;
    printf("Enter any number: ");
    scanf("%d", &n);

    // Checking if the number is prime using the sieve method
    if (isPrimeUsingSieve(n)) {
        printf("%d is a prime number\n", n);
    } else {
        printf("%d is not a prime number\n", n);
    }

    return 0;
}

