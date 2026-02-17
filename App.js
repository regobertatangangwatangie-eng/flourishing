import React, { useEffect, useState } from "react";
import {
  View,
  Text,
  TextInput,
  Button,
  FlatList,
  StyleSheet,
  TouchableOpacity
} from "react-native";

export default function App() {
  const [screen, setScreen] = useState("login");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [products, setProducts] = useState([]);

  const API_URL = "http://YOUR_SERVER_IP/api"; // Change this

  const loginUser = async () => {
    try {
      const response = await fetch(`${API_URL}/login.php`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password })
      });

      const data = await response.json();
      if (data.success) {
        setScreen("products");
      } else {
        alert("Login Failed");
      }
    } catch (error) {
      console.log(error);
    }
  };

  const fetchProducts = async () => {
    try {
      const response = await fetch(`${API_URL}/products.php`);
      const data = await response.json();
      setProducts(data);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    if (screen === "products") {
      fetchProducts();
    }
  }, [screen]);

  if (screen === "login") {
    return (
      <View style={styles.container}>
        <Text style={styles.title}>FarmPro Login</Text>
        <TextInput
          placeholder="Email"
          style={styles.input}
          value={email}
          onChangeText={setEmail}
        />
        <TextInput
          placeholder="Password"
          secureTextEntry
          style={styles.input}
          value={password}
          onChangeText={setPassword}
        />
        <Button title="Login" onPress={loginUser} />
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Farm Products</Text>
      <FlatList
        data={products}
        keyExtractor={(item) => item.id.toString()}
        renderItem={({ item }) => (
          <View style={styles.card}>
            <Text style={styles.product}>{item.name}</Text>
            <Text>Price: ${item.price}</Text>
          </View>
        )}
      />
      <TouchableOpacity
        style={styles.logout}
        onPress={() => setScreen("login")}
      >
        <Text style={{ color: "white" }}>Logout</Text>
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
  }
});
