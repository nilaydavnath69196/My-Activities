#include <iostream>
using namespace std;
int main() {
    int n;
    cout << "Enter number of equations: ";
    cin >> n;
    double A[10][11];
    cout << "Enter augmented matrix: \n";
    for(int i=0;i<n;i++)
        for(int j=0;j<=n;j++)
            cin >> A[i][j];
    for(int i=0;i<n;i++) {
        for(int j=i+1;j<n;j++) {
            double m = A[j][i] / A[i][i];
            for(int k=i;k<=n;k++)
                A[j][k] -= m * A[i][k];  } }
    double x[10];
    for(int i=n-1;i>=0;i--) {
        double sum = A[i][n];
        for(int j=i+1;j<n;j++)
            sum -= A[i][j] * x[j];
        x[i] = sum / A[i][i];
    }
    cout << "Solutions:\n";
    for(int i=0;i<n;i++)
        cout << "x" << i+1 << " = " << x[i] << endl;

    return 0;
}

