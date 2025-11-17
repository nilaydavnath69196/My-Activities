#include <iostream>
#include <vector>
using namespace std;
int knap(vector<int> w, vector<int> v, int cap) {
    int n = w.size();
    vector<vector<int>> dp(n + 1, vector<int>(cap + 1, 0));
    for (int i = 1; i <= n; i++) {
        for (int c = 1; c <= cap; c++) {
            if (w[i - 1] <= c)
                dp[i][c] = max(v[i - 1] + dp[i - 1][c - w[i - 1]], dp[i - 1][c]);
            else
                dp[i][c] = dp[i - 1][c]; }  }
    return dp[n][cap];  }
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

    cout << "Maximum total value = " << knap(w, v, cap);
}

