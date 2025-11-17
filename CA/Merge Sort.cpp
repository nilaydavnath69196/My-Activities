#include <iostream>
using namespace std;
void merge(int a[], int l, int m, int r) {
    int n1 = m - l + 1;
    int n2 = r - m;
    int left[n1], right[n2];
    for(int i=0;i<n1;i++) left[i]=a[l+i];
    for(int j=0;j<n2;j++) right[j]=a[m+1+j];
    int i=0, j=0, k=l;
    while(i<n1 && j<n2) {
        if(left[i] <= right[j]) a[k++] = left[i++];
        else a[k++] = right[j++];}
    while(i<n1) a[k++] = left[i++];
    while(j<n2) a[k++] = right[j++];  }
void mergeSort(int a[], int l, int r) {
    if(l < r) {
        int m = (l + r) / 2;
        mergeSort(a, l, m);
        mergeSort(a, m+1, r);
        merge(a, l, m, r); }  }
int main() {
    int n;
    cout << "Enter size: ";
    cin >> n;

    int a[n];
    cout << "Enter elements: ";
    for(int i=0;i<n;i++) cin >> a[i];
    mergeSort(a,0,n-1);
    cout << "Sorted: ";
    for(int i=0;i<n;i++) cout << a[i] << " ";
}

