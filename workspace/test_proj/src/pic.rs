extern crate image;

pub fn path_read() {
    let mut args = std::env::args();
    args.next();
    let path = match args.next() {
        None => {
            println!("Not Found");
            return
        },
        Some(s) => s,
    };
    println!("{}", path);
}