#include <iostream>
#include <vector>
#include <algorithm>
using namespace std;
struct Item {
    int w, v;
    double r;   };
double fracKnap(vector<int> w, vector<int> v, int cap) {
    int n = w.size();
    vector<Item> it(n);
    for (int i = 0; i < n; i++) {
        it[i].w = w[i];
        it[i].v = v[i];
        it[i].r = (double)v[i] / w[i];  }
    sort(it.begin(), it.end(), [](Item a, Item b){ return a.r > b.r; });
    double tot = 0;
    for (auto &x : it) {
        if (cap == 0) break;
        if (x.w <= cap) {
            tot += x.v;
            cap -= x.w;
        } else {
            tot += x.r * cap;
            cap = 0;  } }
    return tot;   }
int main() {
    int n;
    cout << "Enter number of items: ";
    cin >> n;
    vector<int> w(n), v(n);
    cout << "Enter weights: ";
    for (int i = 0; i < n; i++) cin >> w[i];
    cout << "Enter values: ";
    for (int i = 0; i < n; i++) cin >> v[i];
    int cap;
    cout << "Enter knapsack capacity: ";
    cin >> cap;
    cout << "Maximum achievable value = " << fracKnap(w, v, cap);  }
