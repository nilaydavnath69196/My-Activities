#include <iostream>
#include <vector>
using namespace std;
int getMax(vector<int> a) {
    int m = a[0];
    for (int x : a) if (x > m) m = x;
    return m;
}
void counting(vector<int> &a, int place) {
    int n = a.size();
    vector<int> c(10, 0), out(n);
    for (int x : a) c[(x / place) % 10]++;
    for (int i = 1; i < 10; i++) c[i] += c[i - 1];
    for (int i = n - 1; i >= 0; i--) {
        int d = (a[i] / place) % 10;
        out[c[d] - 1] = a[i];
        c[d]--;  }
for (int i = 0; i < n; i++) a[i] = out[i];  }
void radix(vector<int> &a) {
    int m = getMax(a);
    for (int p = 1; m / p > 0; p *= 10) counting(a, p);   }
int main() {
    int n;
    cout << "Enter number of elements: ";
    cin >> n;
    vector<int> a(n);
    cout << "Enter numbers: ";
    for (int i = 0; i < n; i++) cin >> a[i];
    radix(a);
    cout << "Sorted output: ";
    for (int x : a) cout << x << " ";
}
