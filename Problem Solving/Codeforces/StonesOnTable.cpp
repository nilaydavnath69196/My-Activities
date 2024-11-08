#include <iostream>
using namespace std;

class StonesOnTable {
public:
    void countRemovals();
};
void StonesOnTable::countRemovals()
 {
        int n;
        string s;
        cin >> n >> s;

        int removalCount = 0;
        for (int i = 0; i < n - 1; i++) {
            if (s[i] == s[i + 1]) {
                removalCount++;
            }
        }

        cout << removalCount << endl;
    }
int main() {
    StonesOnTable sot;
    sot.countRemovals();
    return 0;
}

