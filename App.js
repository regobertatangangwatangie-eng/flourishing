import React, { useEffect, useState, useCallback } from "react";
import {
  View,
  Text,
  TextInput,
  Button,
  FlatList,
  StyleSheet,
  TouchableOpacity,
  Alert,
  ActivityIndicator
} from "react-native";

const API_URL = process.env.EXPO_PUBLIC_API_URL || "http://localhost/api";

export default function App() {
  const [screen, setScreen] = useState("login");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(false);

  const loginUser = async () => {
    if (!email || !password) {
      Alert.alert("Error", "Please enter email and password");
      return;
    }

    try {
      setLoading(true);

      const response = await fetch(`${API_URL}/login.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password })
      });

      if (!response.ok) {
        throw new Error("Network response failed");
      }

      const data = await response.json();

      if (data?.success) {
        setScreen("products");
      } else {
        Alert.alert("Login Failed", data?.message || "Invalid credentials");
      }
    } catch (error) {
      console.error("Login error:", error);
      Alert.alert("Error", "Something went wrong");
    } finally {
      setLoading(false);
    }
  };

  const fetchProducts = useCallback(async () => {
    try {
      setLoading(true);

      const response = await fetch(`${API_URL}/products.php`);

      if (!response.ok) {
        throw new Error("Failed to fetch products");
      }

      const data = await response.json();

      // Handle structured API response
      setProducts(Array.isArray(data?.data) ? data.data : []);
    } catch (error) {
      console.error("Fetch error:", error);
      Alert.alert("Error", "Unable to load products");
    } finally {
      setLoading(false);
    }
  }, []);

  useEffect(() => {
    if (screen === "products") {
      fetchProducts();
    }
  }, [screen, fetchProducts]);

  if (screen === "login") {
    return (
      <View style={styles.container}>
        <Text style={styles.title}>FarmPro Login</Text>

        <TextInput
          placeholder="Email"
          style={styles.input}
          value={email}
          autoCapitalize="none"
          keyboardType="email-address"
          onChangeText={setEmail}
        />

        <TextInput
          placeholder="Password"
          secureTextEntry
          style={styles.input}
          value={password}
          onChangeText={setPassword}
        />

        {loading ? (
          <ActivityIndicator size="large" />
        ) : (
          <Button title="Login" onPress={loginUser} />
        )}
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Farm Products</Text>

      {loading ? (
        <ActivityIndicator size="large" />
      ) : (
        <FlatList
          data={products}
          keyExtractor={(item, index) =>
            item?.id ? item.id.toString() : index.toString()
          }
          renderItem={({ item }) => (
            <View style={styles.card}>
              <Text style={styles.product}>{item?.name}</Text>
              <Text>Price: ${item?.price}</Text>
            </View>
          )}
          ListEmptyComponent={<Text>No products available</Text>}
        />
      )}

      <TouchableOpacity
        style={styles.logout}
        onPress={() => {
          setProducts([]);
          setEmail("");
          setPassword("");
          setScreen("login");
        }}
      >
        <Text style={styles.logoutText}>Logout</Text>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 20,
    marginTop: 40
  },
  title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 20
  },
  input: {
    borderWidth: 1,
    borderColor: "#ccc",
    padding: 10,
    marginBottom: 10,
    borderRadius: 5
  },
  card: {
    padding: 15,
    marginBottom: 10,
    backgroundColor: "#f2f2f2",
    borderRadius: 8
  },
  product: {
    fontSize: 18,
    fontWeight: "bold"
  },
  logout: {
    marginTop: 20,
    backgroundColor: "green",
    padding: 15,
    alignItems: "center",
    borderRadius: 5
  },
  logoutText: {
    color: "#fff",
    fontWeight: "bold"
  }
});
