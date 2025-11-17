#include <iostream>
using namespace std;
int partitionIndex(int a[], int low, int high) {
    int pivot = a[high];
    int i = low - 1;
    for(int j = low; j < high; j++) {
        if(a[j] <= pivot) {
            i++;
            swap(a[i], a[j]);  }  }
    swap(a[i+1], a[high]);
    return i + 1;  }
void quickSort(int a[], int low, int high) {
    if(low < high) {
        int p = partitionIndex(a, low, high);
        quickSort(a, low, p - 1);
        quickSort(a, p + 1, high);}  }
int main() {
    int n;
    cout << "Enter size: ";
    cin >> n;
    int a[n];
    cout << "Enter elements: ";
    for(int i = 0; i < n; i++) cin >> a[i];
    quickSort(a, 0, n - 1);
    cout << "Sorted: ";
    for(int i = 0; i < n; i++)
        cout << a[i] << " ";
}

