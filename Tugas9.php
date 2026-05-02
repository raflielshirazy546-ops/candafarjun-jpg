<?php

// CLASS INDUK
class Tabungan {
  // ini adalah construtor 
    Tabungan(string n, int s) {
        nama = n;
        saldo = s;
    }
public:
    void setor(int jumlah) {
        saldo += jumlah;
    }

    void tarik(int jumlah) {
        if (jumlah <= saldo)
            saldo -= jumlah;
        else
            cout << "Saldo tidak cukup\n";
    }

    void tampil() {
        cout << "Nama  : " << nama << endl;
        cout << "Saldo : " << saldo << endl;
    }

protected:
    string nama;

private:
    int saldo;
};


// CLASS ANAK
class Siswa1 extends class tabungan 
public Tabungan {
public:
    Siswa1(string n, int s) : Tabungan(n, s) {}
};

class Siswa2 extends class tabungan 

public Tabungan {
public:
    Siswa2(string n, int s) : Tabungan(n, s) {}
};

class Siswa3 extends class tabungan 

public Tabungan {
public:
    Siswa3(string n, int s) : Tabungan(n, s) {}
};


int main() {
    // ARRAY 
    Siswa1 s1[1] = { Siswa1("Siswa1", 100000) };
    Siswa2 s2[1] = { Siswa2("Siswa2", 150000) };
    Siswa3 s3[1] = { Siswa3("Siswa3", 200000) };

    int pilih, menu, jumlah;
// ini adalah perulangan 
    do {
        cout << "\n=== PILIH SISWA ===\n";
        cout << "1. Siswa1\n2. Siswa2\n3. Siswa3\n0. Keluar\n";
        cout << "Pilih: ";
        cin >> pilih;

        do {
          // ini adalah percabangan 
            if (pilih == 1) {
                cout << "\n-- Siswa1 --\n";
                cout << "1. Lihat\n2. Setor\n3. Tarik\n0. Kembali\n";
                cin >> menu;

                if (menu == 1) s1[0].tampil();
                else if (menu == 2) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s1[0].setor(jumlah);
                }
                else if (menu == 3) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s1[0].tarik(jumlah);
                }
            }

            else if (pilih == 2) {
                cout << "\n-- Siswa2 --\n";
                cout << "1. Lihat\n2. Setor\n3. Tarik\n0. Kembali\n";
                cin >> menu;

                if (menu == 1) s2[0].tampil();
                else if (menu == 2) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s2[0].setor(jumlah);
                }
                else if (menu == 3) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s2[0].tarik(jumlah);
                }
            }

            else if (pilih == 3) {
                cout << "\n-- Siswa3 --\n";
                cout << "1. Lihat\n2. Setor\n3. Tarik\n0. Kembali\n";
                cin >> menu;

                if (menu == 1) s3[0].tampil();
                else if (menu == 2) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s3[0].setor(jumlah);
                }
                else if (menu == 3) {
                    cout << "Jumlah: "; cin >> jumlah;
                    s3[0].tarik(jumlah);
                }
            }
// ini adalah perulangan 
        } while(menu != 0);

    } while(pilih != 0);


    // FILE (fopen & fgets)
    FILE *file = fopen("data.txt", "r");
    if (file != NULL) {
        char teks[100];
        cout << "\nIsi File:\n";
        while (fgets(teks, sizeof(teks), file)) {
            cout << teks;
        }
        fclose(file);
    } else {
        cout << "\nFile tidak ditemukan\n";
    }

    return 0;
}
