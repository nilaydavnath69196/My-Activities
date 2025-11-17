#include <iostream>
#include <vector>
using namespace std;
void insertion(vector<int> &a) {
    for (int i = 1; i < a.size(); i++) {
        int t = a[i], j = i - 1;
        while (j >= 0 && a[j] > t) {
            a[j + 1] = a[j];
            j--;
        }
        a[j + 1] = t;
        }
        }
int main() {
    int n;
    cout << "Enter number of elements: ";
    cin >> n;
    vector<int> a(n);
    cout << "Enter numbers: ";
    for (int i = 0; i < n; i++) cin >> a[i];
    insertion(a);
    cout << "Sorted list: ";
    for (int x : a) cout << x << " ";
}

